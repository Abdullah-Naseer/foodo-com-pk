const menuFrom = `<div class="col-md-10 menuFrom">
                        <div class="text-center">
                            <h5 class="text-site-danger">Fill out the information below</h5>
                            <div class="row text-start">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="site-input required from-control-lg" id="name"
                                        placeholder="Enter Your Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="site-input required from-control-lg"
                                        id="phone" placeholder="Enter Your Phone">
                                </div>
                            </div>
                            <div class="row text-start">
                                <div class="col-md-6 mb-3">
                                    <label for="company" class="form-label">Company Name</label>
                                    <input type="text" name="company" class="site-input required from-control-lg"
                                        id="company" placeholder="Enter Your Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="persons" class="form-label">Menu for how many persons</label>
                                    <input type="number" name="persons" class="site-input required from-control-lg"
                                        id="persons" placeholder="Enter Numbers of Persons">
                                </div>
                            </div>
                            <div class="row text-start">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="site-input required from-control-lg"
                                        id="email" placeholder="Enter Your Email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Delivery Address</label>
                                    <input type="text" name="delivery_address" class="site-input required from-control-lg"
                                        id="address" placeholder="Enter Your Address">
                                </div>
                            </div>
                            <div class="row text-start">
                                <div class="col-md-6 mb-3">
                                    <label for="menu" class="form-label">Menu Type</label>
                                    <select name="menu_type_id" class="site-select" id="menu">
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date" class="form-label">Expected Start Date</label>
                                    <input type="date" name="start_date" class="site-input required from-control-lg"
                                        id="date" placeholder="Select Date">
                                </div>
                            </div>
                            <div class="my-5">
                                <button class="btn btn-lg text-uppercase p-4 px-5 rounded-5 btn-light w-auto back-btn" style="border-radius: 12px !important;">Back</button>
                                <button class="btn btn-site-primary btn-lg w-auto py-4 px-5 text-uppercase view-detail">Next
                                    Step</button>
                            </div>
                        </div>
                    </div>
                    <div class="orderDetail d-none">
                        <div class="col-md-12 px-md-5">
                            <div class="row weeksDetail">

                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="col-md-12 px-md-5">
                            <div class="row pt-5">
                                <h5 class="text-site-danger">Order Details</h5>
                                <div class="col-md-10">
                                    <ul class="list-group list-group-horizontal m-0 orderDetailList">
                                        <li class="list-group-item order-lable">Name: </li>
                                        <li class="list-group-item order-data data-name"></li>
                                        <li class="list-group-item order-lable">Email: </li>
                                        <li class="list-group-item order-data data-email"></li>
                                    </ul>
                                    <ul class="list-group list-group-horizontal m-0 orderDetailList">
                                        <li class="list-group-item order-lable">Phone: </li>
                                        <li class="list-group-item order-data data-phone"></li>
                                        <li class="list-group-item order-lable">Delivery Address</li>
                                        <li class="list-group-item order-data data-delivery_address"></li>
                                    </ul>
                                    <ul class="list-group list-group-horizontal m-0 orderDetailList">
                                        <li class="list-group-item order-lable">Company Name: </li>
                                        <li class="list-group-item order-data data-company"></li>
                                        <li class="list-group-item order-lable">Menu Type: </li>
                                        <li class="list-group-item order-data data-menu"></li>
                                    </ul>
                                    <ul class="list-group list-group-horizontal m-0 orderDetailList">
                                        <li class="list-group-item order-lable">Number of individuals: </li>
                                        <li class="list-group-item order-data data-persons"></li>
                                        <li class="list-group-item order-lable">Expected Start Date: </li>
                                        <li class="list-group-item order-data data-start_date"></li>
                                    </ul>
                                </div>
                                <div class="col-md-2">
                                <img src="public/assets/images/order-confirmation.gif" class="orderPlacedImg d-none" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 orderConfirmed text-end mt-3 px-5">
                            <button class="btn btn-lg view-form text-uppercase p-4 px-5 rounded-5 btn-light w-auto">Back</button>
                            <button class="btn  place-order  btn-lg text-uppercase p-4 rounded-5 btn-site-primary w-auto" id="confirmOrder">Confirm</button>
                        </div>
                        <div class="col-md-12 orderPlaced d-md-none d-none text-md-end mt-3 bg-site-danger p-3 d-md-flex justify-content-around align-items-center">
                            <p class="fs-5 text-white m-0">Your Order has been Confirmed! You’ll soon receive a confirmation message on your Email.</p>
                            <button class="btn btn-lg text-uppercase p-4 rounded-5 btn-warning w-auto d-none" style="border-radius: 12px;background-color: #FBB03B;border-color: #FBB03B;">Back To Home</button>

                        </div>
                    </div>`;

const menuArray = $("#menues").val();
const menuTypesArray = $("#menueTypes").val();
var menuObj = JSON.parse(menuArray);
var menuTypesObj = JSON.parse(menuTypesArray);

$(document).ready(function () {
    $(".owl-carousel").each(function (index) {
        $(this).owlCarousel({
            loop: false,
            margin: 10,
            responsiveClass: true,
            dots: false,
            navText: ["&#x27E8;", "&#x27E9;"],
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 1,
                    nav: false,
                },
                1000: {
                    items: 1,
                    nav: true,
                },
            },
        });
    });

    createCustomStepsForm();
    $(document).on("click", ".custom-owl-prev", function () {
        const owlIndex = $(this).data("number");
        $(`.owl${owlIndex}`).trigger("prev.owl.carousel");
    });

    $(document).on("click", ".custom-owl-next", function () {
        const owlIndex = $(this).data("number");
        $(`.owl${owlIndex}`).trigger("next.owl.carousel");
    });
});
$(document).on("click", ".nav-link", function () {
    $(".menuTab").removeClass("d-none");
    $(".menuFrom").empty();
    $(".orderDetail").empty();
    resetCustomFrom();
});

$(document).on("click", ".selectMenu", function () {
    var menuId = $(this).data("id");
    const menus = menuObj.type_id[menuId]["weeks"];

    $(".menuTab" + menuId).addClass("d-none");
    $(".menuRow" + menuId).append(menuFrom);

    if (menuTypesObj) {
        const selectType = $("#menu");
        let matchedMenuType = "Custom"; // Default text if no match is found

        menuTypesObj.forEach((menu) => {
            selectType.append(
                `<option value="${menu.id}">${menu.type}</option>`
            );

            if (menuId == menu.id) {
                matchedMenuType = menu.type;
            }
        });

        $(".data-menu").text(matchedMenuType);
    }

    $("#menu").val(menuId);
    $("#menu").prop("disabled", true);

    for (var i = 0; i < 4; i++) {
        const weekData = menus[i + 1];
        let weekCol = `<div class="col-md-3 p-md-0 mb-4 mb-md-0">
                    <div class="col-title">
                        <div>
                            <span class="rounded-circle">
                                <div class="rounded-circle bg-danger p-1 checkIcon text-white m-1">&#10004;</div>
                            </span>
                            <div class="week-divider week-divider${
                                i + 1
                            }"></div>
                        </div>
                        <h5 class="text-site-danger">Week ${i + 1}</h5>
                    </div>`;
        weekData.forEach((item, index) => {
            weekCol += `<div class="menu-item">
                    <span class="item-day">${item.day}</span>
                    <span class="item-name">&#8226; ${item.name}</span>
                </div>`;
        });
        weekCol += `</div>`;
        $(".weeksDetail").append(weekCol);
    }
});

$(document).on("click", ".view-detail", function () {
    if (!validate()) return false;
    $(".menuFrom").addClass("d-none");
    $(".orderDetail").removeClass("d-none");
});
$(document).on("click", ".view-form", function () {
    $(".menuFrom").removeClass("d-none");
    $(".orderDetail").addClass("d-none");
});
$(document).on("change", ".site-input", function () {
    var attr = $(this).attr("name");
    var val = $(this).val();
    $(".data-" + attr).text(val);
});

function validate() {
    var valid = true;
    var div = "div";
    $(".text-danger").remove();
    $(".required:visible").each(function () {
        if (
            $(this).val() == "" ||
            $(this).val() === null ||
            $(this).attr("type") == "radio" ||
            ($(this).attr("type") == "checkbox" &&
                $('[name="' + $(this).attr("name") + '"]:checked').val() ==
                    undefined)
        ) {
            $(this).attr("type") == "checkbox" ? (div = ".row") : (div = "div");
            var name = $(this).attr("name");
            $(this)
                .closest(div)
                .append(
                    '<div class="text-danger fs-6" data-field=' +
                        name +
                        ">This field is required</div>"
                );
            valid = false;
        }
        if (
            $(this).attr("name") === "persons" &&
            parseInt($(this).val(), 10) < 30 &&
            valid
        ) {
            $(this)
                .closest(div)
                .append(
                    '<div class="text-danger fs-6" data-field=' +
                        name +
                        ">Menu is available for minimum 30 persons</div>"
                );
            valid = false;
        }
        if ($(this).attr("name") === "start_date" && valid) {
            let dateValue = new Date($(this).val()); // Convert it to a Date object
            let today = new Date(); // Get today's date

            // Set the time of today's date to 00:00:00 for accurate comparison
            today.setHours(0, 0, 0, 0);

            if (dateValue <= today) {
                $(this)
                    .closest(div)
                    .append(
                        '<div class="text-danger fs-6" data-field=' +
                            name +
                            ">Date is not available</div>"
                    );
                valid = false;
            }
        }
        if ($(this).attr("name") === "phone" && valid) {
            var condition = /^\d{11}$/.test($(this).val());
            if (!condition) {
                $(this)
                    .closest(div)
                    .append(
                        '<div class="text-danger fs-6" data-field=' +
                            name +
                            ">Please enter correct phone number</div>"
                    );
                valid = false;
            }
        }
        
        if ($(this).attr("name") === "email" && valid) {
            var emailCondition = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($(this).val());
            if (!emailCondition) {
                $(this)
                    .closest(div)
                    .append(
                        '<div class="text-danger fs-6" data-field=' +
                            name +
                            ">Please enter a valid email address</div>"
                    );
                valid = false;
            }
        }
        
    });
    if (!valid) {
        var input = $(".alert-danger:first").attr("data-field");
        $('[name="' + input + '"]').focus();
    }
    return valid;
}
$(document).on("change", ".custom-meal-selector", function () {
    resetCustomFrom();
});
function createCustomStepsForm() {
    let html = ``;
    for (var i = 1; i < 5; i++) {
        html += `<h5 class="text-site-danger mb-2 text-center">
                    <div class="custom-divider startNode${i}"></div>
                    <span class="d-grid">
                        <i class="fa fa-circle fs-6 icon${i}"></i>
                    </span>
                    <div class="custom-divider endNode${i}"></div>
                </h5>
                <section class="pt-0" data-week="${i}">
                    <h5 class="text-site-danger">
                        Week ${i}
                    </h5>
                    <div class="custom-week${i}">

                    </div>
                </section>`;
    }
    $("#customStepFrom").html(html);
    createCustomItemBox();
    $("#customStepFrom").show().steps({
        headerTag: "h5",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical",
    });
    $('a[href="#next"]').addClass("disabled btn-light").attr("href", "#new");
    $('a[href="#finish"]').addClass("d-none").text("Next");
}
let emptyMealArray = [];
let selectedMealArray = [];
let currentIndex = 0;
let currentDayIndex = 0;
let removedDaysArray;
function createCustomItemBox() {
       const generateDays = (count) => {
        const allDays = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
        return allDays.slice(0, count);
    };

    let count = parseInt(
        $(".custom-meal-selector").find(":selected").data("count")
    );

    let days = generateDays(count);

    for (var i = 1; i < 5; i++) {
        let html = ``;
        emptyMealArray.push([]);
        days.forEach((value, index) => {
            emptyMealArray[i - 1].push(value);
            html += `<div class="col-12 mb-4">
                        <div class="add-item-custom-btn bg-light customDiv${value}${i}">
                            <span class="custom-add-span customAdd${value}${i}">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="custom-remove-span d-none customRemove${value}${i}" data-day="${value}" data-week="${i}">
                                <i class="fa fa-minus"></i>
                            </span>
                            <p class="ms-4 item${value}${i} mb-0">Add Item</p>
                            <p class="itemDay${value}${i}  ms-auto bg-danger text-white rounded-pill px-3">${value}</p>
                        </div>
                        <input type="hidden" class="input${value}${i} customInputData" name="meal_id[]" data-day="${value}" data-week="${i}" data-name="${i}" />
                    </div>`;
        });
        $(".custom-week" + i).html(html);
    }
    removedDaysArray = JSON.parse(JSON.stringify(emptyMealArray));
}

$(document).on("click", ".custom-remove-span", function () {
    let index = $(this).data("week");
    let day = $(this).data("day");
    $(".customRemove" + day + index).addClass("d-none");
    $(".customAdd" + day + index).removeClass("d-none");
    $(".item" + day + index).text("Add Item");
    $(".input" + day + index).val("");
    $(".customDiv" + day + index)
        .removeClass("bg-light")
        .addClass("bg-light");
    index = index - 1;
    if (index >= 0 && index < emptyMealArray.length) {
        if (!emptyMealArray[index].includes(day)) {
            emptyMealArray[index].unshift(day);
            if (emptyMealArray[index].length === 1) {
                currentIndex--;
            }
        }
    }
    resetCustomFromUi();
});
$(document).on("click", ".meal-item", function () {

    var leftItems = getCustomMealLeftData();
    var id = $(this).data("id");
    var name = $(this).data("name");
    var currentWeek = $(".body.current").data("week");
    if (leftItems[currentWeek] === undefined) {
        return false;
    }

    if (leftItems[currentWeek].length) {
        var week = currentWeek;
        var day = leftItems[currentWeek][0].day;
        var inputClass = ".input" + day + week;
        $(inputClass).val(id);
        $(inputClass).attr("data-name", name);
        $(".item" + day + week).text(name);
        $(".customRemove" + day + week).removeClass("d-none");
        $(".customAdd" + day + week).addClass("d-none");
        $(".customDiv" + day + week)
            .addClass("bg-light")
            .removeClass("bg-light");
        // Remove a day from the current sub-array
        if(emptyMealArray[currentIndex]){
            emptyMealArray[currentIndex].splice(currentDayIndex, 1);
        }

        // If the sub-array is empty, move to the next index
        // if (emptyMealArray[currentIndex].length === 0) {
        //     $(".mealUl").addClass("bg-light");
        //     $(".mealUl").css("cursor", "not-allowed");
        //     $(".meal-item").css("cursor", "not-allowed");
        //     $('a[href="#new"]')
        //         .removeClass("disabled btn-light")
        //         .attr("href", "#next");
        //     $('a[href="#finish"]').removeClass("d-none");
        //     currentIndex++;
        //     currentDayIndex = 0;
        // }
    }
    if (leftItems[currentWeek].length === 1) {
        $(".mealUl").addClass("bg-light");
            $(".mealUl").css("cursor", "not-allowed");
            $(".meal-item").css("cursor", "not-allowed");
            $('a[href="#new"]')
                .removeClass("disabled btn-light")
                .attr("href", "#next");
            $('a[href="#finish"]').removeClass("d-none");
            currentIndex++;
            currentDayIndex = 0;
        return false;
    }
});
$(document).on("click", 'a[href="#next"]', function (event) {
    event.preventDefault(); // Prevent the default anchor click behavior
    resetCustomFromUi();
    checkCurrentTabFillMenu('next');
});
$(document).on("click", 'a[href="#previous"]', function (event) {
    event.preventDefault(); // Prevent the default anchor click behavior
    var week = $(".body.current").data("week");
    if(week == 3){
        $('a[href="#new"]')
        .removeClass("disabled btn-light") // Add the 'disabled' class
        .attr("href", "#next");
        $('a[href="#next"]').parent().css('display' , 'block').removeClass('disabled');
    }
    checkCurrentTabFillMenu('prev');
});

$(document).on("click", 'a[href="#finish"]', async function (event) {
    let result = await swal.fire({
        title: "Are you sure?",
        text: "You won't be able to modify menu after confirmation!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm it!",
    });

    // Find the closest parent with the desired data attribute
    const parentDataAttr = $(this).closest(".getRow").data("menurow");

    if (result.value) {
        var menuText = $(".custom-meal-selector").find(":selected").text();
        var menuId = $(".custom-meal-selector").find(":selected").val();
        $(".weeksDetail").empty();

        var menu = getCustomMealData();
        var tabHtml = $(`.menuRow${parentDataAttr}`)
            .children(`.menuTab${parentDataAttr}`)
            .html();
        $(`.menuRow${parentDataAttr}`).empty();
        var divHtml =
            `<div class="col-md-11 menuTab${parentDataAttr} menuTab">` +
            tabHtml +
            `</div>`;
        $(`.menuRow${parentDataAttr}`).append(divHtml);
        $(`.menuTab${parentDataAttr}`).addClass("d-none");
        $(`.menuRow${parentDataAttr}`).append(menuFrom);
        $("#menu").append(`<option value='${menuId}'>${menuText}</option>`);
        $(".back-btn").addClass("d-none");
        $("#menu").prop("disabled", true);
        $(".data-menu").text(menuText);
        for (var i = 1; i < 5; i++) {
            var weekData = menu[i];
            let weekCol = `<div class="col-md-3 p-md-0 mb-4 mb-md-0">
                        <div class="col-title">
                            <div>
                                <span class="rounded-circle">
                                    <div class="rounded-circle bg-danger p-1 checkIcon text-white m-1">&#10004;</div>
                                </span>
                                <div class="week-divider week-divider${i}"></div>
                            </div>
                            <h5 class="text-site-danger">Week ${i}</h5>
                        </div>`;
            weekData.forEach((item, index) => {
                weekCol += `<div class="menu-item">
                        <span class="item-day">${item.day}</span>
                        <span class="item-name">&#8226; ${item.name}</span>
                    </div>`;
            });
            weekCol += `</div>`;
            $(".weeksDetail").append(weekCol);
        }
    }
});
$(document).on("keyup", "#meal", function (e) {
    var value = $(this).val().toLowerCase();
    searchMeal(value);
});
function searchMeal(value) {
    var ul = $(".mealUl");
    //get all list but not the one having search input
    var li = ul.find(".col-12");
    //hide all lis
    li.hide();
    li.filter(function () {
        var text = $(this).find(".menu-name").text().toLowerCase();
        return text.indexOf(value) >= 0;
    }).show();
}
function resetCustomFromUi() {
    $(".mealUl").removeClass("bg-light");
    $(".mealUl").css("cursor", "auto");
    $(".meal-item").css("cursor", "pointer");
    $('a[href="#next"]')
        .addClass("disabled btn-light") // Add the 'disabled' class
        .attr("href", "#new");
    $('a[href="#finish"]').addClass("d-none");
}
function resetCustomFrom() {
    emptyMealArray = [];
    removedDaysArray = null;
    selectedMealArray = [];
    currentIndex = 0;
    currentDayIndex = 0;
    removedDaysArray = null;
    $("#customStepFrom").empty();
    createCustomStepsForm();
    resetCustomFromUi();
}

function orderPlaced() {
    $(".orderConfirmed").addClass("d-none");
    $(".orderPlaced").removeClass("d-md-none d-none");
    $(".orderPlacedImg").removeClass("d-none");
}
function getCustomMealLeftData() {
    var array = [];

    $(".customInputData").each((index, ele) => {
        var obj = {
            id: $(ele).val(),
            week: $(ele).attr("data-week"),
            day: $(ele).attr("data-day"),
            name: $(ele).attr("data-name"),
        };
        if($(ele).val()){}
        else{
            array.push(obj);
        }
    });
    return array.reduce((acc, item) => {
        // Initialize an array for the week if it doesn't exist
        if (!acc[item.week]) {
            acc[item.week] = [];
        }
        // Add the item to the corresponding week array
        acc[item.week].push(item);
        return acc;
    }, {});
}
function getCustomMealData() {
    var array = [];

    $(".customInputData").each((index, ele) => {
        var obj = {
            id: $(ele).val(),
            week: $(ele).attr("data-week"),
            day: $(ele).attr("data-day"),
            name: $(ele).attr("data-name"),
        };
        if($(ele).val()){
            array.push(obj);
        }
    });
    return array.reduce((acc, item) => {
        // Initialize an array for the week if it doesn't exist
        if (!acc[item.week]) {
            acc[item.week] = [];
        }
        // Add the item to the corresponding week array
        acc[item.week].push(item);
        return acc;
    }, {});
}
function checkCurrentTabFillMenu(eventType) {
    var week = $(".body.current").data("week");
    var arr = getCustomMealData();
    var match = parseInt(
        $(".custom-meal-selector").find(":selected").data("count")
    );
    let count;
    if(arr[week] === undefined)
    {
        count = 0;
    }
    else{
        count = arr[week].reduce((sum, item) => {
            return sum + 1;
        }, 0);
    }

    if (count == match) {
        $('a[href="#new"]')
        .removeClass("disabled btn-light") // Add the 'disabled' class
        .attr("href", "#next");
        if (week === 4) {
            $('a[href="#finish"]').removeClass("d-none");
        }
    } else {
        $('a[href="#next"]')
            .addClass("disabled btn-light")
            .attr("href", "#new");
    }
}
$(document).on("click", "#confirmOrder", async function () {
    $(this).prop("disabled", true);

    let result = await swal.fire({
        title: "Are you sure?",
        text: "You won't be able to cancel this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm it!",
    });

    if (result.value) {
        const data = {};

        $(".menuFrom input, .menuFrom select").each(function () {
            const fieldName = $(this).attr("name");
            const fieldValue = $(this).val().trim();
            data[fieldName] = fieldValue;
        });

        var activeType = $(".menu-links.active").attr("data-type");

        if (activeType == 1) {
            data["menuItems"] = getCustomMealData();
        }

        await $.ajax({
            type: "POST",
            url: "/create-order",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.success) {
                    orderPlaced();
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                }
            },
            error: function (xhr) {
                const errors = xhr.responseJSON.errors;
                let errorMessage = "Please correct the following errors:\n\n";
                for (const field in errors) {
                    errorMessage += `${errors[field].join(", ")}\n`;
                }
                alert(errorMessage);
            },
            complete: function () {
                $("#confirmOrder").prop("disabled", false);
            },
        });
    } else {
        $(this).prop("disabled", false);
    }
});



$(document).on("click", ".back-btn", function () {
    $(".menuFrom").empty();
    $(".orderDetail").empty();
    $(".menuFrom").addClass("d-none");
    $(".menuTab").removeClass("d-none");
});
