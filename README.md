# Skupszop - zadanie rekrutacyjne

## O projekcie

## Wymagania

PHP 8.2 oraz nodejs >= 18. Rozszerzenie: php-sqllite3.

## Uruchomienie

1. Pobierz repozytorium.
2. Utwórz bazę danych SQL Lite: `touch database/database.sqlite`
3. Uruchom migracje.
4. Zbuduj biblioteki UI: `npm install && npm run dev`
5. Uruchom aplikacje.
6. Uruchom testy - powinny zwrócić 10 błędów. Komenda: `php artisan test`

## Zadania:

1. Dodanie zapisywania pliku dla książki edycji książki. Uruchom test: `php artisan test --filter=TaskOneTest`
2. Popraw test na sprawdzanie usuwania książek. Uruchom test: `php artisan test --filter=TaskTwoTest`
3. Dodaj test ma usuwanie autora. Uruchom test: `php artisan test --filter=TaskThreeTest`
4. Dodaj widok do edycji autora. Uruchom test: `php artisan test --filter=TaskFourTest`
5. Dodaj logikę do kontrolera edycji atrybutów. Uruchom test: `php artisan test --filter=TaskFiveTest`
6. Napraw błąd z listowaniem atrybutów. Uruchom test: `php artisan test --filter=TaskSixTest`
7. Utwórz global scope, który pobierze kategorie z popularnością większą od 2. Uruchom test: `php artisan test --filter=TaskSevenTest`
8. Dodaj route model binding po slug-u w autorze. Uruchom test: `php artisan test --filter=TaskEightTest`
9. Utwórz role i przypisz je użytkownikom. Uruchom test: `php artisan test --filter=TaskNineTest`
10. Stwórz, wykorzystaj i uruchom seeder dla modelu Atrybuty. Uruchom test: `php artisan test --filter=TaskTenTest`

## Początkowy efekt

```
  Tests:    10 failed (10 assertions)
  Duration: 3.73s
```

## Zamierzony efekt

```
   PASS  Tests\Unit\ExampleTest
  ✓ that true is true                                                                                                                                                                                                                                        0.10s  

   PASS  Tests\Feature\TaskEightTest
  ✓ authors model will use slug as route model binding                                                                                                                                                                                                       1.61s  

   PASS  Tests\Feature\TaskFiveTest
  ✓ can see book edit page                                                                                                                                                                                                                                   0.07s  

   PASS  Tests\Feature\TaskFourTest
  ✓ can see author edit page                                                                                                                                                                                                                                 0.01s  

   PASS  Tests\Feature\TaskNineTest
  ✓ categories are created properly                                                                                                                                                                                                                          0.04s  

   PASS  Tests\Feature\TaskOneTest
  ✓ can see unknown binding type text                                                                                                                                                                                                                        0.06s  

   PASS  Tests\Feature\TaskSevenTest
  ✓ can see pagination links                                                                                                                                                                                                                                 0.01s  

   PASS  Tests\Feature\TaskSixTest
  ✓ example                                                                                                                                                                                                                                                  0.03s  

   PASS  Tests\Feature\TaskTenTest
  ✓ attributes are created properly                                                                                                                                                                                                                          0.01s  

   PASS  Tests\Feature\TaskThreeTest
  ✓ can delete author                                                                                                                                                                                                                                        0.01s  

   PASS  Tests\Feature\TaskTwoTest
  ✓ book can be deleted                                                                                                                                                                                                                                      0.01s  

  Tests:    11 passed (15 assertions)
  Duration: 2.81s
```

## Podsumowanie Implementacji Zadań

Zadanie Szóste - Naprawa Listowania Atrybutów:
- Naprawiono widok indeksu atrybutów poprzez usunięcie nieistniejącej kolumny 'pages'
- Zaktualizowano widok, aby wyświetlał tylko istniejące kolumny: szerokość, wysokość i wagę
- Zapewniono prawidłową strukturę tabeli i stylowanie Bootstrap

Zadanie Siódme - Global Scope dla Kategorii:
- Utworzono klasę PopularCategoryScope do filtrowania kategorii o popularności > 2
- Dodano global scope do modelu Category
- Zaimplementowano funkcjonalność aplikowania i usuwania scope'a
- Zapewniono wpływ scope'a na wszystkie zapytania modelu Category

Zadanie Ósme - Route Model Binding dla Autorów:
- Dodano pole slug do tablicy fillable w modelu Author
- Zaimplementowano metodę getRouteKeyName() do używania sluga w route binding
- Zaktualizowano trasy, aby używały URL-i opartych na slugu
- Zachowano prawidłowe relacje modelu i soft deletes

Zadanie Dziewiąte - Implementacja Ról Użytkowników:
- Utworzono RoleEnum z przypadkami USER i ADMIN
- Utworzono model Role z odpowiednimi relacjami
- Utworzono tabele roles i users_roles wraz z migracjami
- Dodano relację roles i metodę hasRole do modelu User
- Utworzono widoki dla użytkownika i admina
- Zaimplementowano kontrolę dostępu opartą na rolach w PageController
- Utworzono RoleSeeder i UserSeeder
- Skonfigurowano relacje w tabeli pivot

Zadanie Dziesiąte - Seeder dla Atrybutów:
- Utworzono AttributeFactory z generowaniem realistycznych danych:
  * Szerokość: 10-300
  * Wysokość: 10-400
  * Waga: 0.1-5.0 (3 miejsca po przecinku)
- Utworzono AttributeSeeder generujący 10 losowych atrybutów
- Zintegrowano seeder w DatabaseSeeder
- Zapewniono prawidłowe wypełnianie danymi i walidację
