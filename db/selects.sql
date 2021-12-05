-- Wyswietl klientow spoza leszna
SELECT * FROM `klienci` WHERE miejscowosc <> 'Leszno'

-- Wyswietl klientow z leszna
SELECT * FROM `klienci` WHERE miejscowosc = 'Leszno'; 

-- Wyswietl jakie trzeba dokupic oraz ile
SELECT s.nazwa, (si.sugerowana_ilosc - s.ilosc_na_stanie) AS "Ilosc do dokupienia" FROM `sugerowane_ilosci` AS si
JOIN skladniki s ON si.id_skladnika = s.id
WHERE s.ilosc_na_stanie < si.sugerowana_ilosc

-- Wyswietl szczegoly zamowien ktore czekaja na zrealizowanie
SELECT k.imie, k.nazwisko, k.miejscowosc AS "Gdzie", p.nazwa AS "Co" FROM `zamowienia` AS z
JOIN klienci k ON k.id = z.id_klienta
JOIN posilki p ON p.id = z.id_posilku
WHERE z.data_dostarczenia = '0000-00-00'

-- Wyswietl ile zamowien czeka na realizacje
SELECT COUNT(z.id) AS "Czekajace na realizacje"
FROM `zamowienia` AS z
WHERE z.data_dostarczenia = '0000-00-00'

-- Miasto w ktorym jest przecietnie najwiecej zamowien na klienta

-- Wyswietl ktora plec zamawia wiecej dan pogrupowane wedlug kodu pocztowego

-- Wyswietl ktora plec zamawia statystycznie drozsze dania dan pogrupowane wedlug kodu pocztowego