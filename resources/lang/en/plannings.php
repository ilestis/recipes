<?php

return [
    'fields' => [
        'recipe_id' => 'Recipe',
        'day' => 'Day',
        'is_lunch' => 'Lunch',
        'time' => 'Time',
    ],

    'values' => [
        'time' => [
            0 => 'Evening',
            1 => 'Lunch'
        ]
    ],

    'validation' => [
        'created' => 'Meal planned.',
        'updated' => 'Planned meal updated.',
        'generated' => 'New planning generated.',
    ]
];