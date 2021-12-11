## Get ingredients list

```
SELECT
  *
FROM
  storage
```

## Get ingredients nearly depleted

```
SELECT
  *
FROM
  storage
WHERE
  (item_quantity < recommended_quantity)
  AND item_quantity <> 0;
```

## Get missing ingredients

```
SELECT
  *
FROM
  storage
WHERE
  item_quantity = 0;
```
