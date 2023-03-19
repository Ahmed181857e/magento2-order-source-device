Module Description
Ahmed_order is a Magento 2 module that adds a new order_source_device attribute to the sales_order table in the Magento 2 database. This attribute is used to store the source device (e.g. web, mobile, tablet) for each order. Unlike Magento's default behavior of using the EAV (Entity-Attribute-Value) model to store custom attributes, Ahmed_order uses the flat sales_order table to store the order_source_device attribute. This provides better performance and simpler data retrieval.

The module also provides GraphQL API endpoints to retrieve and update the order_source_device attribute for a specific order.

Installation
Copy the Ahmed_order module directory to the app/code directory of your Magento 2 installation.
Run the following commands in your Magento 2 root directory:
python
Copy code
php bin/magento module:enable Ahmed_order
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:clean
Usage
To retrieve the order_source_device attribute for a specific order using GraphQL, use the following query:

css
Copy code
query {
  getOrderSourceDevice(order_id: "<order_id>") 
}
To update the order_source_device attribute for a specific order using GraphQL, use the following mutation:

javascript
Copy code
mutation {
  updateOrderSourceDevice(
    input: {
      order_id: "<order_id>",
      order_source_device: "<source_device>"
    }
  ) {
    result {
      success
    }
  }
}
Make sure to replace <order_id> with the actual order ID and <source_device> with the desired source device
