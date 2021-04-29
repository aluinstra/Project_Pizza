require("./bootstrap");

const axios = require("axios");
const { identity } = require("lodash");
categoryElements = document.getElementsByClassName("categoryRow");

function createEventHandlers() {
    //loop over "category" elements to create different handlers for every row
    // console.log(categoryElements.length);
    for (let i = 0; i < categoryElements.length; i++) {
        categoryElements[i].onchange = function(e) {
            getIngredients(e, i);
            console.log("hi");
        };
        // console.log(plusElements.this);
    }

    // document.getElementById("category").onchange = function(e) {

    function getIngredients(e, i) {
        console.log("Hello");
        const category_id = e.target.value;

        document.getElementsByClassName("ingredients")[i].options.length = 0;

        axios
            .get(`/categories/${category_id}/ingredients`)
            .then(function(response) {
                const option = document.createElement("option");
                option.text = "Select Product";
                const ingredients = document.getElementsByClassName(
                    "ingredients"
                );
                ingredients[i].appendChild(option);

                console.log(response.data.ingredients);
                data = response.data.ingredients;
                data.forEach(ingredient => {
                    const option = document.createElement("option");
                    option.text = ingredient.ingredient;
                    option.value = ingredient.id;
                    console.log("option", option);
                    console.log("value = ", option.value);
                    const ingredients = document.getElementsByClassName(
                        "ingredients"
                    );
                    ingredients[i].appendChild(option);
                });
                // document.getElementClassName("ingredients").innerHTML = response.data;
            })
            .catch(function(error) {
                console.log(error);
            })
            .then(function() {
                // always executed
            });
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#addRowButton").addEventListener("click", addRow);
});

function addRow() {
    console.log("yello");
    const row = document.getElementById("recipeTableRow");
    // console.log(row);

    const table = document.getElementById("ingredients_selection"); // find table to append to
    const clone = row.cloneNode(true); // copy children too
    // clone.id = "row_" + id; // change id or other attributes/contents

    table.tBodies[0].insertBefore(clone, addRowButton); // add new row to end of table
    createEventHandlers();
    emptyIngredientsOptions((i = categoryElements.length - 1));
}

function emptyIngredientsOptions(i) {
    document.getElementsByClassName("ingredients")[i].options.length = 0;

    const option = document.createElement("option");
    option.text = "Select Product";
    const ingredients = document.getElementsByClassName("ingredients");
    ingredients[i].appendChild(option);
}

document.addEventListener("DOMContentLoaded", function() {
    document
        .querySelector("#checkButton")
        .addEventListener("click", checkIngredient);
});

function checkIngredient() {
    console.log("hi d");
    // let ingredientsArray = [];

    const ingredients = document.getElementsByClassName("ingredients");
    ingredientsArray = [].slice.call(ingredients);
    ingredientsArray = ingredientsArray.map(item => item.value);
    console.log(ingredientsArray);

    axios
        .get("/pizzas/filter", {
            params: {
                ingredientsArray
            }
        })
        .then(function(response) {
            // document.getElementById("pizzaContainer").innerHTML = "";
            // return;
            console.log("Axios", response.data.pizzas);
            document.getElementById("pizzaContainer").innerHTML = response.data;
        })
        .catch(function(error) {
            console.log(error);
        })
        .then(function() {
            // always executed
        });
}

createEventHandlers();
