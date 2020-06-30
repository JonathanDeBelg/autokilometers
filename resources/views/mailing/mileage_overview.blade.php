@component('mail::message')
Overzicht van de gemaakte kilometers van afgelopen maand

@component('mail::table')
| Naam        | Kilometers             |
| :-----------| ----------------------:|
| Jonathan    | {{ $mileageJonathan }} |
| Laura       | {{ $mileageLaura }}    |
| Nicolas     | {{ $mileageNicolas }}  |
@endcomponent

Kilometerstand aan het einde van deze maand is; {{ $endingMileage }}
