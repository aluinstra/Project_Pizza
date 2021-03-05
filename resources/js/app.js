require("./bootstrap");

const axios = require("axios");

document.getElementById("category").onchange = function (e) {
    // console.log("Hello");
    const category_id = e.target.value;

    axios
        .get(`/categories/${category_id}/ingredients`, {
            params: {
                category_id,
            },
        })
        .then(function (response) {
            console.log(response);
            // var ingredients = document.getElementById("ingredients");
            // var option = document.createElement("option");
            // option.text = ;
            // x.add(option);
            // document.getElementById("contentWrapper").innerHTML = response.data;
        })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {
            // always executed
        });
};
