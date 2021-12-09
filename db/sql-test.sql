SELECT
  m.name
FROM
  orders o
  JOIN meals m ON m.id = o.meal_id
WHERE
  o.order_date BETWEEN '2021-12-25 00:00:00'
  AND o.order_date < '2021-12-1 00:00:00'
GROUP BY
  m.id
ORDER BY
  SUM(o.quantity) DESC
LIMIT
  1