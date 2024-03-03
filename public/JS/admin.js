// // // =====================================
// // // Variables
// // // =====================================

const sideMenu = document.querySelector("aside");
// const menuBtn = document.querySelector("#menu-btn");
// const closeBtn = document.querySelector("#close-btn");
// const themeToggler = document.querySelector(".theme-toggler");
// const Lo = document.querySelector(".loader_bg-toggler");
// const siderA = document.querySelector(".sidera");

// // // =====================================
// // // Functions
// // // =====================================
$(() => {
    $('#btnAddProduct').click(()=>{
        $('#frmAddProduct').toggle()
    })

    $('#btnAddCategory').click(()=>{
        $('#frmAddCategory').toggle()
    })
    
})
// // menuBtn.addEventListener('click', ()=>{
// //     sideMenu.style.display = 'block';
// // })

// // closeBtn.addEventListener('click', ()=>{
// //     sideMenu.style.display = 'none';
// // })

// // // change theme
// themeToggler.addEventListener("click", () => {
//     //document.body.classList.toggle('dark-theme-variables');
//     document.body.classList.toggle("dark");

//     themeToggler
//         .querySelector("span:nth-child(1)")
//         .classList.toggle("dark_mode");
//     themeToggler
//         .querySelector("span:nth-child(2)")
//         .classList.toggle("light_mode");
// });

// // active class
$(() => {
    
    function activeClass(panel) {
        $(".sidera").removeClass("active");
        panel.addClass("active");
    }

    $("#btnDashborad").click(() => {
        activeClass($("#btnDashborad"));
    });

    $("#btnCustomer").click(() => {
        activeClass($("#btnCustomer"));
    });

    $("#btnCategory").click(() => {
        activeClass($("#btnCategory"));
    });

    $("#btnOrder").click(() => {
        activeClass($("#btnOrder"));
    });

    $("#btnMessages").click(() => {
        activeClass($("#btnMessages"));
    });

    $("#btnProduct").click(() => {
        activeClass($("#btnProduct"));
    });
});

// // Loader js ----------
// setTimeout(() => {
//     $(".loader_bg").fadeToggle();
// }, 500);

// // On page load or when changing themes, best to add inline in `head` to avoid FOUC
// if (
//     localStorage.theme === "dark" ||
//     (!("theme" in localStorage) &&
//         window.matchMedia("(prefers-color-scheme: dark)").matches)
// ) {
//     document.documentElement.classList.add("dark");
// } else {
//     document.documentElement.classList.remove("dark");
// }

// // Whenever the user explicitly chooses light mode
// localStorage.theme = "light";

// // Whenever the user explicitly chooses dark mode
// localStorage.theme = "dark";

// // Whenever the user explicitly chooses to respect the OS preference
// localStorage.removeItem("theme");


// // Slider------------->
