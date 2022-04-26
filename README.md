### Guidelines that might be helpful to note
* In a path, every first, and subsequent even node is a collection, every odd node is a document. Eg "collection/document/collection/document"
* Data is stored in documents. Collections help with logically grouping data
* Every node with "$" in the name indicates that the name is dynamic. i.e: "$user_name" implies this node has an id matching the user name of the relevant user. All other are static



## Paths in the database
- Buses -> "public/bus_system/buses/$bus_id"
- Bus departures -> "public/bus_system/departure/$date" //the date should be in ISOString (2022-04-26T00:36:35.059)
- Notifications -> "public/communication/notification/$notification_id"
- Maintenance reports -> "public/communication/maintenance_reports/$report_id"
- Tickets (reciepts) -> "public/transactions/tickets/$ticket_id"
- Payments (transaction records) -> "public/transactions/payments/$payment_id"
- User payment information -> "public/user_info/$user_id/payment_info"
- Advanced credit balance -> "public/user_info/$user_id/advance_balance"
