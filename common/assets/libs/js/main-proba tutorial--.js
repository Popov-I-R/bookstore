let carts = document.querySelectorAll('.add-cart');

let products = [     // Тук мисля би тледвало да проверява колко такива продукти имаме в кошницата
    {
        name: 'Grey Tshirt',
        tag: 'greytshoity',
        price: 15,
        incart:0
    }
];



for(let i=0; i < carts.length;  i++) {
    carts[i].addEventListener('click',()=> {
        cartNumbers();
    });
};

function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    
    if(productNumbers) {
        document.querySelector('.cart span').textContent = productNumbers;
    }
}



function cartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers'); // Слагаме в localstorage числото, което се образува от това колко пъти сме натиснали продукта
    
    productNumbers = parseInt(productNumbers); // Превръщаме стнинга в число
    
    if( productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers +1);
        document.querySelector('.cart span').textContent = productNumbers +1; // така променяме числото в клас карт и в спан
    } else {
         localStorage.setItem('cartNumbers', 1);
         document.querySelector('.cart span').textContent = 1;
    }
    
    
    
//   localStorage.setItem('cartNumbers', 1); 
};

onLoadCartNumbers();