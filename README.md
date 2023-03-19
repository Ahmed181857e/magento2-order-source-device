# Ahmed_Order Module

This module adds a new attribute to the `sales_order` table in Magento 2 to store the source device of the order. This attribute is added to the table instead of using the EAV model for performance reasons.

## Installation

1. Copy the module files to `app/code`.
2. Run `php bin/magento module:enable Ahmed_Order`.
3. Run `php bin/magento setup:upgrade`.
4. Run `php bin/magento setup:di:compile`.
5. Run `php bin/magento cache:clean`.

## GraphQL API

The module adds a new GraphQL mutation `updateOrderSourceDevice` to update the `order_source_device` attribute for an order:

```graphql
mutation UpdateOrderSourceDevice($orderId: String!, $orderSourceDevice: String!) {
  updateOrderSourceDevice(order_id: $orderId, order_source_device: $orderSourceDevice) {
    success
  }
}

query {
  getOrderSourceDevice(order_id: "000000006")
}
