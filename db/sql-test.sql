SELECT
  CONCAT(c.name, ' ', c.surname) AS best_client,
  SUM(m.cost_net) AS spent_money
FROM
  orders o
  JOIN clients c ON c.id = o.client_id
  JOIN meals m ON m.id = o.meal_id
GROUP BY
  c.id
ORDER BY
  spent_money DESC
LIMIT
  1