import 'package:flutter/material.dart';
import 'package:flutter_map/flutter_map.dart';
import 'package:latlong2/latlong.dart';
import 'package:geolocator/geolocator.dart';
import 'package:flutter_map_location_marker/flutter_map_location_marker.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatefulWidget {
  @override
  _MyAppState createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  final MapController _mapController = MapController();

  // Titik koordinat yang benar untuk Telkom University Purwokerto
  LatLng _currentPosition = LatLng(-7.424942, 109.244145);

  List<Marker> _markers = [];

  @override
  void initState() {
    super.initState();
    _addMarker(_currentPosition, "Telkom University Purwokerto");
  }

  // Fungsi mendapatkan lokasi pengguna
  Future<void> _getCurrentLocation() async {
    bool serviceEnabled;
    LocationPermission permission;

    // Cek apakah layanan lokasi aktif
    serviceEnabled = await Geolocator.isLocationServiceEnabled();
    if (!serviceEnabled) {
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text("Layanan lokasi tidak aktif")));
      return;
    }

    // Cek dan minta izin lokasi
    permission = await Geolocator.checkPermission();
    if (permission == LocationPermission.denied) {
      permission = await Geolocator.requestPermission();
      if (permission == LocationPermission.deniedForever) {
        ScaffoldMessenger.of(context).showSnackBar(
            SnackBar(content: Text("Izin lokasi ditolak secara permanen")));
        return;
      }
    }

    // Dapatkan lokasi pengguna
    Position position = await Geolocator.getCurrentPosition(
        desiredAccuracy: LocationAccuracy.best);
    print("Koordinat pengguna: ${position.latitude}, ${position.longitude}");

    setState(() {
      _currentPosition = LatLng(position.latitude, position.longitude);
      _mapController.move(_currentPosition, 17.0);
      _addMarker(_currentPosition, "Lokasi Saya");
    });
  }

  // Fungsi menambahkan marker
  void _addMarker(LatLng position, String title) {
    setState(() {
      _markers = [
        Marker(
          point: position,
          width: 40.0,
          height: 40.0,
          child: Icon(Icons.location_pin, color: Colors.red, size: 40),
        ),
      ];
    });
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          title: Text("OpenStreetMap - Telkom University Purwokerto"),
          backgroundColor: Colors.green,
        ),
        body: FlutterMap(
          mapController: _mapController,
          options: MapOptions(
            initialCenter: _currentPosition, // Memastikan titik awal benar
            initialZoom: 17.0,
            onTap: (tapPosition, latLng) {
              _addMarker(latLng, "Lokasi Dipilih");
            },
          ),
          children: [
            TileLayer(
              urlTemplate: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
              subdomains: ['a', 'b', 'c'],
            ),
            MarkerLayer(markers: _markers),
            CurrentLocationLayer(),
          ],
        ),
        floatingActionButton: FloatingActionButton(
          onPressed: _getCurrentLocation,
          child: Icon(Icons.my_location),
        ),
      ),
    );
  }
}
