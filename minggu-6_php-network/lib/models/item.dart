import 'package:intl/intl.dart';

class Item {
  final int id;
  final String name;
  final double price;
  int quantity;

  Item({
    required this.id,
    required this.name,
    required this.price,
    this.quantity = 1,
  });

  String get formattedPrice {
    final formatCurrency = NumberFormat.currency(
      locale: 'id_ID',
      symbol: 'Rp ',
    );
    return formatCurrency.format(price);
  }
}
