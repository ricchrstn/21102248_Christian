import 'package:flutter/material.dart';

void main() => runApp(const MyApp());

/// This is the main application widget.
class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);
  static const String _title = 'Flutter Code Sample';

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      title: _title,
      home: MyStatefulWidget(),
    );
  }
}

/// This is the stateful widget that the main application instantiates.
class MyStatefulWidget extends StatefulWidget {
  const MyStatefulWidget({Key? key}) : super(key: key);

  @override
  State<MyStatefulWidget> createState() => _MyStatefulWidgetState();
}

/// This is the private State class that goes with MyStatefulWidget.
class _MyStatefulWidgetState extends State<MyStatefulWidget> {
  int _selectedIndex = 0; // For BottomNavigationBar
  String? selectedValue; // For DropdownButton
  final List<String> dropdownItems = [
    'Option 1',
    'Option 2',
    'Option 3'
  ]; // Dropdown items

  static const TextStyle optionStyle = TextStyle(
    fontSize: 30,
    fontWeight: FontWeight.bold,
  );

  static const List<Widget> _widgetOptions = <Widget>[
    Text('Index 0: Home', style: optionStyle),
    Text('Index 1: Business', style: optionStyle),
    Text('Index 2: School', style: optionStyle),
  ];

  void _onItemTapped(int index) {
    setState(() {
      _selectedIndex = index;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Combined Widgets Example'),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            // Display the selected tab content
            _widgetOptions.elementAt(_selectedIndex),

            const SizedBox(height: 20), // Spacing

            // ElevatedButton
            ElevatedButton(
              onPressed: () {
                print('ElevatedButton Pressed: Submit');
              },
              child: const Text('Submit'),
            ),

            const SizedBox(height: 20), // Spacing

            // TextButton
            TextButton(
              onPressed: () {
                print('TextButton Pressed: Menu');
              },
              child: const Text('Menu'),
            ),

            const SizedBox(height: 20), // Spacing

            // DropdownButton
            DropdownButton<String>(
              value: selectedValue,
              hint: const Text('Select an option'),
              onChanged: (String? newValue) {
                setState(() {
                  selectedValue = newValue!;
                });
                print('DropdownButton Selected: $newValue');
              },
              items:
                  dropdownItems.map<DropdownMenuItem<String>>((String value) {
                return DropdownMenuItem<String>(
                  value: value,
                  child: Text(value),
                );
              }).toList(),
            ),
          ],
        ),
      ),
      bottomNavigationBar: BottomNavigationBar(
        items: const <BottomNavigationBarItem>[
          BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Home'),
          BottomNavigationBarItem(
              icon: Icon(Icons.business), label: 'Business'),
          BottomNavigationBarItem(icon: Icon(Icons.school), label: 'School'),
        ],
        currentIndex: _selectedIndex,
        selectedItemColor: Colors.amber[800],
        onTap: _onItemTapped,
      ),
    );
  }
}
