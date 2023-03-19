# Ahmed_Order Module

This module adds a new attribute to the `sales_order` table in Magento 2 to store the source device of the order. This attribute is added to the table instead of using the EAV model for performance reasons.

## Installation

1. Create a directory app/code/Ahmed/order if it doesn't exist..
2. Clone this repository inside the directory using the command: git clone https://github.com/Ahmed181857e/magento2-order-source-device.git .
3. Run  bin/magento module:enable Ahmed_Order.
4. Run `bin/magento setup:di:compile`.
5. Run `bin/magento cache:clean`.

## GraphQL API

The module adds a new GraphQL mutation `updateOrderSourceDevice` to update the `order_source_device` attribute for an order:
and can get data

```graphql
 mutation {
   updateOrderSourceDevice(order_id: "oderID", order_source_device: "mobile")     
 }
 
query {
  getOrderSourceDevice(order_id: "oderID")
}
