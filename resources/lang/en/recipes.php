<?php

return [
    'header' => 'Your very own recipe list! You can enter as many as you want, so don\'t be shy.',
    
    'redirect_no_recipes' => 'Before you can start planning your meals, you\'ll need to enter a few recipes.',

    'validation' => [
        'create' => 'Your new recipe is saved.',
        'update' => 'Your recipe has been updated.',
        'delete' => 'Your recipe has been removed.',
    ],

    'actions' => [
        'save' => 'Save',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'back' => 'Back to Recipes',
    ],

    'fields' => [
        'name' => 'Recipe name',
        'ingredients' => 'Ingredients',
        'duration' => 'Duration',
        'difficulty' => 'Difficulty',
        'frequency' => 'Frequency',
    ],
    'values' => [
        'difficulty' => [
            1 => 'Easy',
            2 => 'Normal',
            3 => 'Difficult',
            4 => 'God Mode',
        ],
        'frequency' => [
            'weekly' => 'Weekly',
            'bi-weekly' => 'Bi-weekly',
            'monthly' => 'Monthly',
        ]
    ],
];