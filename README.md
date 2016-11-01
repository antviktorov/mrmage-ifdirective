# mrmage-ifdirective
Custom module for Magento 1.x. Equal comparison in email template.

Example how to use equal directive comparison in email template

{{if var order.getShippingMethod() = some_cool_shipping_method}}
Shipping method is {{var order.getShippingMethod()}}
{{else}}
Shipping method isn't listed.
{{/if}}

The key feature is that we can use this "var order.getShippingMethod() = some_cool_shipping_method" construcation in email template.
