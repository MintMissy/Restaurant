SELECT
  delivery_postcode,
  COUNT(id) AS orders_amount
FROM
  orders
GROUP BY
  delivery_postcode
ORDER BY
  orders_amount DESC
LIMIT
  1