// /**
//  * Toggle search icon with accessibility in mind
//  * @param {string} el - selector for adding an active class
//  */

// export function toggleSearch(el) {

//     const btn = document.querySelector(el);

//     btn.addEventListener('click', event => {
//         event.preventDefault();
//         if (btn.getAttribute('aria-expanded') === 'false') {
//             btn.classList.add('is-active');
//             btn.setAttribute('aria-expanded', 'true')
//         } else {
//             btn.classList.remove('is-active');
//             btn.setAttribute('aria-expanded', 'false')
//         }
//     })

//     /* Check outside click */
//     document.addEventListener('click', function (event) {

//         if (!event.target.closest('.site-search')) {
//             // click outside

//             if (btn.getAttribute('aria-expanded') === 'true') {
//                 btn.classList.remove('is-active');
//                 btn.setAttribute('aria-expanded', 'false')
//             }
//         } else {
//             // click inside
//         }

//     }, false);
// }
