/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
/*import './styles/app.css';*/

// start the Stimulus application
/*import './bootstrap';*/


import '../css/app.scss';
import {Dropdown} from "bootstrap";

document.addEventListener('DOMContentLoaded', () => {
    new App();
});

class App {
    constructor() {
        this.enabledDropdowns();
        this.handleCommentForm();
    }

    enabledDropdowns()
    {
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        dropdownElementList.map(function (dropdownToggleEl) {
            return new Dropdown(dropdownToggleEl)
        });
    }

    handleCommentForm() {

        const commentForm = document.querySelector('form.comment-form');

        if (null === commentForm) {
            return;
        }

        console.log(commentForm);

        commentForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const response = await fetch('/ajax/commentaires', {
                method: 'POST',
                body: new FormData(e.target)
            });

            if (!response.ok) {
                return;
            }

            const json = await response.json();

            console.log(json);

        });
    }
}