SELECT
  WEEKDAY(order_date) AS busiest_day,
  COUNT(*) AS orders_amount
FROM
  `orders`
GROUP BY
  busiest_day
ORDER BY
  orders_amount DESC
LIMIT
  1