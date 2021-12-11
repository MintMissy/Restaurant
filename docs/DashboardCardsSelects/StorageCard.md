## Ingredients Nearly Depleted Amount

```
SELECT
  COUNT(*)
FROM
  storage
WHERE
  (item_quantity < recommended_quantity)
  AND item_quantity <> 0;
```

## Ingredients Missing Amount

```
SELECT
  COUNT(*)
FROM
  storage
WHERE
  item_quantity = 0;
```
