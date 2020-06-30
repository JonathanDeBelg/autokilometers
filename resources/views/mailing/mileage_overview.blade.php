@component('mail::message')
Overzicht van de gemaakte kilometers van afgelopen maand

@component('mail::table')
| Naam        | Totaal aantal KM (incl KM voor ma en pa) | KM's op de zaak                 |
| :-----------| :----------------------------------------| :-------------------------------|
| Jonathan    | {{ $mileageJonathan }}km                 | {{ $mileageJonathanCompany }}km |
| Laura       | {{ $mileageLaura }}km                    | {{ $mileageLauraCompany }}km    |
| Nicolas     | {{ $mileageNicolas }}km                  | {{ $mileageNicolasCompany }}km  |
@endcomponent

Kilometerstand aan het einde van deze maand is; {{ $endingMileage }}km
@endcomponent
