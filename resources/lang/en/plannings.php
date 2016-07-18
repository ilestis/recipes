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
    'titles' => [
        'index' => 'Planning',
        'edit' => 'Edit a Planned Meal',
        'view' => 'Details of a Planned Meal',
    ],

    'helpers' => [
        'is_lunch' => 'Check if this a lunchtime meal. Otherwise, it is considered as an evening meal.',
    ],
    'nothing_planned' => 'You don\'t seem to have anything planned yet. If you have some recipes set up, click the "Generate" button. This will generate some meals for you based on your recipes for the current season and based on availability. If nothing comes up, make sure you have enough recipes and check on their frequency. A recipe set to Monthly won\'t appear if you\'ve had it less then a month ago.',

    'actions' => [
        'save' => 'Save',
        'edit' => 'Edit',
        'history' => 'View past meals',
        'back' => 'Back to Planning',
        'show' => 'Show',
        'generate' => 'Generate meals for the next few days',
        'delete' => 'Remove',
    ],

    'values' => [
        'time' => [
            0 => 'Evening',
            1 => 'Lunch'
        ]
    ],

    'validations' => [
        'created' => 'Meal planned.',
        'updated' => 'Planned meal updated.',
        'generated' => 'New planning generated.',
        'deleted' => 'Your planned meal has been removed.',
    ],

    'errors' => [
        'no_recipes' => 'Sorry, I couldn\'t find any recipes to generate a meal planner for you. This could be because of several factors. Make sure you have enough recipes for the current season, and make sure the frequency of your recipes are properly set. A meal set to appear monthly will not show up more often.',
        'not_enough_recipes' => 'I\'ve generated a meal planner for you, I just couldn\'t find as many recipes as I would have wanted. Make sure you have enough recipes for the current season, and make sure the frequency of your recipes are properly set.',
    ],

    'history' => [
        'title' => 'History',
        'header' => 'View the meals you\'ve recently had.',
        'actions' => [
            'back' => 'Back to Planning',
        ],
        'no_history' => 'You don\'t seem to have eaten anything yet.',
    ],

    'view' => [
        'title' => 'View Planning',
    ]
];