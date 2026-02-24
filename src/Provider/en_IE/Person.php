<?php

namespace Faker\Provider\en_IE;

class Person extends \Faker\Provider\Person
{
    protected static $maleNameFormats = [
        '{{firstNameMale}} {{lastName}}',
    ];

    protected static $femaleNameFormats = [
        '{{firstNameFemale}} {{lastName}}',
    ];

    /**
     * @see https://www.cso.ie/en/interactivezone/visualisationtools/babynamesofireland/
     */
    protected static $firstNameMale = [
        'Aaron', 'Adam', 'Aidan', 'Alan',
        'Barry', 'Brendan', 'Brian',
        'Cathal', 'Cian', 'Ciaran', 'Colm', 'Conor', 'Cormac',
        'Daniel', 'Darragh', 'David', 'Declan', 'Denis', 'Dermot', 'Diarmuid', 'Donal', 'Dylan',
        'Eamon', 'Eoin',
        'Fergal', 'Fintan', 'Fionn',
        'Gareth', 'Gary',
        'Jack', 'James', 'Jason', 'John', 'Joseph',
        'Keith', 'Kevin', 'Kieran', 'Killian',
        'Liam', 'Lorcan', 'Luke',
        'Malachy', 'Mark', 'Martin', 'Michael',
        'Niall', 'Noel',
        'Oisin', 'Owen',
        'Padraig', 'Patrick', 'Paul', 'Peter',
        'Robert', 'Ronan', 'Rory', 'Ryan',
        'Seamus', 'Sean', 'Shane', 'Simon', 'Stephen',
        'Tadhg', 'Thomas', 'Timothy',
    ];

    /**
     * @see https://www.cso.ie/en/interactivezone/visualisationtools/babynamesofireland/
     */
    protected static $firstNameFemale = [
        'Aisling', 'Amy', 'Anna', 'Aoife',
        'Bridget', 'Brigid',
        'Caoimhe', 'Catherine', 'Chloe', 'Ciara', 'Claire', 'Clodagh',
        'Deirdre',
        'Eileen', 'Eimear', 'Ella', 'Emer', 'Emily', 'Emma',
        'Fionnuala', 'Fiona',
        'Grace', 'Grainne',
        'Hannah', 'Holly',
        'Jane', 'Jennifer',
        'Kate', 'Katie',
        'Laura', 'Lauren', 'Lily', 'Lisa',
        'Maeve', 'Mairead', 'Mary', 'Megan', 'Molly',
        'Niamh', 'Nora',
        'Olivia', 'Orlaith',
        'Rachel', 'Roisin',
        'Saoirse', 'Sarah', 'Sinead', 'Siobhan', 'Sophie', 'Sorcha',
    ];

    /**
     * @see https://www.cso.ie/en/media/csoie/census/documents/Surnames_in_Ireland.pdf
     */
    protected static $lastName = [
        'Barry', 'Brady', 'Brennan', 'Brown', 'Burke', 'Butler', 'Byrne',
        'Campbell', 'Carroll', 'Casey', 'Clarke', 'Collins', 'Connolly',
        'Daly', 'Doherty', 'Donnelly', 'Donovan', 'Doyle', 'Duffy', 'Dunne',
        'Farrell', 'Fitzgerald', 'Fitzpatrick', 'Flynn', 'Foley',
        'Gallagher',
        'Hayes', 'Healy', 'Hughes',
        'Johnston',
        'Kavanagh', 'Kelly', 'Kennedy',
        'Lynch',
        'Maguire', 'Mahon', 'Martin', 'McCarthy', 'McDonnell', 'McGrath', 'McLoughlin', 'McMahon', 'Moore', 'Moran', 'Murphy', 'Murray',
        'Nolan',
        'O\'Brien', 'O\'Callaghan', 'O\'Connell', 'O\'Connor', 'O\'Dea', 'O\'Donnell', 'O\'Farrell', 'O\'Grady', 'O\'Leary', 'O\'Mahony', 'O\'Neill', 'O\'Reilly', 'O\'Shea', 'O\'Sullivan',
        'Power',
        'Quinn',
        'Regan', 'Ryan',
        'Smith', 'Stewart', 'Sweeney',
        'Thompson',
        'Walsh', 'Wilson',
    ];
}
