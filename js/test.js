let lis = document.querySelectorAll(".sub-menu .menu-item-has-children");
//lis.insertAdjacentHTML('beforeend', '<p>tt</p>');
[].forEach.call(lis, (e)=>{
 //e.querySelector("a").insertAdjacentHTML('afterend', '<button class="sub-menu-toggle" aria-expanded="false" onclick="twentytwentyoneExpandSubMenu(this)"><span class="icon-plus"><svg class="svg-icon" width="18" height="18" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18 11.2h-5.2V6h-1.6v5.2H6v1.6h5.2V18h1.6v-5.2H18z" fill="currentColor"></path></svg></span></button>');
e.querySelector("a").insertAdjacentHTML('afterend', '<button class="sub-menu-toggle toggle-right" aria-expanded="false" onclick="twentytwentyoneExpandSubMenu(this)"><span class="material-icons md-20">chevron_right</span></button>');
});


let lis2 = document.querySelectorAll(".first > .menu-item-has-children");

[].forEach.call(lis2, (e)=>{
 //e.querySelector("a").insertAdjacentHTML('afterend', '<button class="sub-menu-toggle" aria-expanded="false" onclick="twentytwentyoneExpandSubMenu(this)"><span class="icon-plus"><svg class="svg-icon" width="18" height="18" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18 11.2h-5.2V6h-1.6v5.2H6v1.6h5.2V18h1.6v-5.2H18z" fill="currentColor"></path></svg></span></button>');
e.querySelector("a").insertAdjacentHTML('afterend', '<button class="sub-menu-toggle" aria-expanded="false" onclick="twentytwentyoneExpandSubMenu(this)"><span class="material-icons md-20">expand_more</span></button>');
});
