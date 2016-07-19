<?php

return [
    'header' => 'Your very own recipe list! You can enter as many as you want, so don\'t be shy.',
    
    'redirect_no_recipes' => 'Before you can start planning your meals, you\'ll need to enter a few recipes.',
    
    'titles' => [
        'index' => 'Recipes',
        'create' => 'Create a new Recipe',
        'edit' => 'Update a Recipe',
        'view' => 'Details of a Recipe',
    ],
    
    'validations' => [
        'create' => 'Your new recipe is saved.',
        'update' => 'Your recipe has been updated.',
        'delete' => 'Your recipe has been removed.',
    ],
    'errors' => [
        'delete' => 'You can\'t delete a Recipe that has been used for a planned meal.',
    ],

    'actions' => [
        'create' => 'Add',
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
        'seasons' => 'Seasons',
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