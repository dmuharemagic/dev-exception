
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });

axios.defaults.baseURL = 'http://serenity.ist.rit.edu/~dm6254/240/project/final/public/index.php/';

axios.interceptors.response.use(response => {
    return response;
}, error => {
    if (error.response.status === 401) {
        window.location = '/login';
    }

    return error;
});

$(function () {

    $(window).scroll(() => {
        const btn = $("#return-top");

        if ($(this).scrollTop() >= 300) {
            btn.show();
        } else {
            btn.hide();
        }
    });

    $("#return-top").click((element) => {
        element.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    $(window).click(function () {
        $("#search-menu").slideUp("fast");
    });

    $("#search").each(function () {
        $(this).autocomplete({
            source: function (request) {

                $("#search-menu").show();
                $("#search-menu").html('<div class="dropdown-content"></div>');

                axios.get('search', { params: { 'term': request.term } }).then(function (data) {
                    if (data.data == "") {
                        $(".dropdown-content").append(createDropdownElement({ title: 'No posts found' }, true));
                    } else {
                        for (post of data.data) {
                            $(".dropdown-content").append(createDropdownElement(post));
                        }
                    }
                })
            },
            minLength: 1
        });


        $("#search").on("keyup", function () {
            if ($(this).val().length == 0) {
                $("#search-menu").slideUp("fast");
            }
        });

    });

    function createDropdownElement(post, empty = false) {
        const dropdown = empty == false ? document.createElement('a') : document.createElement('p');
        if (!empty) {
            dropdown.href = "http://serenity.ist.rit.edu/~dm6254/240/project/final/public/index.php/post/" + post.slug
        }
        dropdown.innerHTML = post.title;
        dropdown.classList.add('dropdown-item');
        dropdown.classList.add('truncate-menu');

        return dropdown;
    }

    $(".post").each(function () {
        $(this).click(function (element) {
            element.preventDefault();
            window.location = $(this).data("link");

        });
        $(this).css('cursor', 'pointer');
    });

    $(".card-meta-right").each(function () {
        const e = $(this);

        console.log(e);

        const vote = e.find('.upvote-count').find('strong');
        let voteCount = parseInt(vote.text());

        console.log("Votes: " + voteCount);

        const upvote = e.find('.upvote');
        const downvote = e.find('.downvote');

        upvote.click(function () {
            axios.post('post/' + e.data('id') + "/vote/up")
                .then(function (response) {
                    console.log(response);

                    if (response.data == "saved") {
                        voteCount++;
                        vote.text(voteCount);
                        upvote.addClass('voted');
                    } else if (response.data == "updated") {
                        voteCount++;
                        vote.text(voteCount);

                        downvote.removeClass('voted');
                        upvote.addClass('voted');
                    } else if (response.data == "deleted") {
                        voteCount--;
                        vote.text(voteCount);
                        upvote.removeClass('voted');
                    }
                });
        });

        downvote.click(function () {
            axios.post('post/' + e.data('id') + "/vote/down")
                .then(function (response) {
                    console.log(response);
                    if (response.data == "saved") {
                        voteCount--;
                        vote.text(voteCount);
                        downvote.addClass('voted');
                    } else if (response.data == "updated") {
                        voteCount = voteCount - 2;
                        vote.text(voteCount);

                        upvote.removeClass('voted');
                        downvote.addClass('voted');
                    } else if (response.data == "deleted") {
                        voteCount--;
                        downvote.removeClass('voted');
                    }
                });
        });

    });

    const burger = $('.burger');
    const menu = $('.navbar-menu');

    burger.click(() => {
        burger.toggleClass('is-active');
        menu.toggleClass('is-active');
    });

});
