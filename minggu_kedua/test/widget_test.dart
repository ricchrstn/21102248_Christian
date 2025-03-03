import 'package:flutter/material.dart';
import 'package:flutter_test/flutter_test.dart';

import 'package:praktikum_3/main.dart';

void main() {
  testWidgets('MyApp renders correctly', (WidgetTester tester) async {
    // Build our app and trigger a frame.
    await tester.pumpWidget(const MyApp());

    // Verify that the app renders without errors.
    expect(find.byType(MaterialApp), findsOneWidget);
    expect(find.byType(Scaffold), findsOneWidget);
  });

  testWidgets('Container widget renders correctly',
      (WidgetTester tester) async {
    // Build the Container widget and trigger a frame.
    await tester.pumpWidget(MaterialApp(
      home: Scaffold(
        body: Container(
          color: Colors.red,
          width: 100,
          height: 100,
        ),
      ),
    ));

    // Verify that the Container is rendered.
    expect(find.byType(Container), findsOneWidget);
  });

  testWidgets('ListView widget renders correctly', (WidgetTester tester) async {
    // Build the ListView widget and trigger a frame.
    await tester.pumpWidget(MaterialApp(
      home: Scaffold(
        body: ListView(
          children: const [
            Text('Item 1'),
            Text('Item 2'),
            Text('Item 3'),
          ],
        ),
      ),
    ));

    // Verify that the ListView and its items are rendered.
    expect(find.byType(ListView), findsOneWidget);
    expect(find.text('Item 1'), findsOneWidget);
    expect(find.text('Item 2'), findsOneWidget);
    expect(find.text('Item 3'), findsOneWidget);
  });
}
