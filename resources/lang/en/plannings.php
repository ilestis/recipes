<?php

return [
    'title' => 'Planning',
    'header' => 'So, what\'s for diner?',
    'fields' => [
        'recipe_id' => 'Recipe',
        'day' => 'Day',
        'is_lunch' => 'Lunch',
        'time' => 'Time',
    ],
    'helpers' => [
        'is_lunch' => 'Check if this a lunchtime meal. Otherwise, it is considered as an evening meal.',
    ],

    'actions' => [
        'save' => 'Save',
        'edit' => 'Edit',
        'history' => 'View had meals',
        'back' => 'Back to Planning',
        'show' => 'Show',
        'generate' => 'Generate meals for the next few days'
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
    ],

    'history' => [
        'title' => 'History',
        'header' => 'View the meals you\'ve recently had.',
        'actions' => [
            'back' => 'Back to Planning',
        ]
    ],

    'view' => [
        'title' => 'View Planning',
    ]
];