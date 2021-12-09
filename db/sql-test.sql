SELECT
  m.name
FROM
  orders o
  JOIN meals m ON m.id = o.meal_id
WHERE
  o.order_date > '2021-12-09 18:04:16'
  AND o.order_date < '2021-11-11 18:04:16'
GROUP BY
  m.id
ORDER BY
  SUM(o.quantity) DESC
LIMIT
  1