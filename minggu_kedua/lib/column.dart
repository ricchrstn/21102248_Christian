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
          title: Text('Column'),
        ),
        body: SingleChildScrollView(
          child: Padding(
            padding: const EdgeInsets.all(16.0),
            child: Column(
              children: [
                // Contoh 1: Column dengan teks dan logo Flutter
                Column(
                  children: const [
                    Text('Deliver features faster'),
                    Text('Craft beautiful UIs'),
                    Expanded(
                      child: FittedBox(
                        fit: BoxFit.contain,
                        child: FlutterLogo(),
                      ),
                    ),
                  ],
                ),
                SizedBox(height: 20), // Spasi antara dua contoh
                // Contoh 2: Column dengan teks dan gaya khusus
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  mainAxisSize: MainAxisSize.min,
                  children: <Widget>[
                    const Text('We move under cover and we move as one'),
                    const Text(
                        'Through the night, we have one shot to live another day'),
                    const Text('We cannot let a stray gunshot give us away'),
                    const Text(
                        'We will fight up close, seize the moment and stay in it'),
                    const Text(
                        'It’s either that or meet the business end of a bayonet'),
                    const Text('The code word is ‘Rochambeau,’ dig me?'),
                    Text(
                      'Rochambeau!',
                      style: DefaultTextStyle.of(context)
                          .style
                          .apply(fontSizeFactor: 2.0),
                    ),
                  ],
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
