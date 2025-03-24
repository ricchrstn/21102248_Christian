import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Row'),
        ),
        body: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Row(
            children: <Widget>[
              const FlutterLogo(), // Logo Flutter
              const SizedBox(width: 10), // Jarak antara logo dan teks
              const Expanded(
                child: Text(
                  "Flutter's hot reload helps you quickly and easily experiment, build UIs, "
                  "add features, and fix bugs faster. Experience sub-second reload times, "
                  "without losing state, on emulators, simulators, and hardware for iOS and Android.",
                  style: TextStyle(fontSize: 16),
                ),
              ),
              const SizedBox(width: 10), // Jarak antara teks dan ikon
              const Icon(Icons.sentiment_very_satisfied), // Ikon
            ],
          ),
        ),
      ),
    );
  }
}
