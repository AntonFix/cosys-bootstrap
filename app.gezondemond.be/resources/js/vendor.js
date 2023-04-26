/*
import jQuery from 'jquery';

window.$ = jQuery;

document.addEventListener('DOMContentLoaded', function () {
    // jquery code here
    $("button").click(function () {
        $("p").hide();
    });
}, false);

import 'choices.js/public/assets/styles/choices.min.css'
import Choices from 'choices.js';

window.choices = Choices;

const element = document.querySelector('.spreektalen');

const choices = new Choices(element, {
        silent: false,
        searchEnabled: true,
        allowHTML: false,
        removeItems: true,
        removeItemButton: true,
        /!*choices: [
            {
                value: '1',
                label: 'Option 1',
                selected: false,
                disabled: false,
            },
            {
                value: '2',
                label: 'Test 2',
                selected: false,
                disabled: false,
                customProperties: {
                    description: 'Custom description about Option 2',
                    random: 'Another random custom property'
                },
            }
        ],*!/
    }
).setChoices(async () => {
    try {
        const items = await fetch('/json/languages.json');
        return items.json();
    } catch (err) {
        console.error(err);
    }
});
*/
