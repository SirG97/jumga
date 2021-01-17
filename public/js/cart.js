document.addEventListener('DOMContentLoaded', (event) => {
let app = new Vue({
        el: "#root",
        data: {
            products: [],
            items:[],
            loading: false,
            cartLoading: false,
            buttonLoading: false,
            failed: false,
            cartTotal: 0,
            rawTotal: 0,
            grandTotal: 0,
            delivery_fee: 0,
            message: '',
            vendorId: $("#vid").data('id'),
            disableCheckoutBtn: true,
            authenticated: false,
        },
        methods:{
            getProducts: () =>{
                // this.loading = true;
                axios.get(`/products/all`).then((response)=>{
                    // console.log(response.data);
                    app.products = response.data.products;
                    console.log(app.products);
                    app.loading = false;
                }).catch((e) =>{
                    console.log(e);
                });
            },

            addToCart: (merchant,id, name, unit_price, e) =>{
                // app.buttonLoading = !app.buttonLoading;
                // console.log(event.target.id);
                e.path[0].innerHTML = "Adding <i class=\"fa fa-circle-notch fa-spin\"></i>";
                let token = $('.product-container').data('token');
                let postData = $.param({merchant_id: merchant, product_id: id});

                axios.post('/cart/add', postData).then((response) => {
                    // app.updateCartView();
                    // $("#toast").css("display", "block").html(response.data.success);
                    // setTimeout((e)=>{
                    //     $("#toast").css("display", "none")
                    // }, 2500);
                    $('#food'. id).html("Add to Cart");
                    e.path[0].innerHTML = "Add to Cart";

                }).catch((e) => {
                    console.log(e , 'baboon');
                    // this.buttonLoading = false;
                    e.path[0].innerHTML = "Add to Cart";
                    $("#toast").removeClass('alert-success').addClass('alert-danger').css("display", "block").html(e);
                });
                // alert(`Food with id ${id} and ${token} has been added to cart`)
            },
            getCartItems: () =>{
                // this.cartLoading = true;
                // setTimeout(function(){
                    axios.get('/items').then((response)=>{
                        console.log(response);
                        if(response.data.error){
                            // It means cart is empty
                            app.cartLoading = false;
                            app.message = response.data.error;
                            app.authenticated = response.data.authenticated;
                            app.disableCheckoutBtn = true;
                            console.log(this.disableCheckoutBtn);

                        }else if(response.data.items !== undefined){
                            app.items = response.data.items;
                            app.cartTotal = response.data.cartTotal;
                            app.cartLoading = false;
                            app.grandTotal = response.data.grandTotal;
                            app.rawTotal = response.data.rawTotal;
                            app.delivery_fee = response.data.delivery_fee;
                            app.authenticated = response.data.authenticated;
                            app.disableCheckoutBtn = false;

                            console.log(app.authenticated);

                        }else{
                            app.disableCheckoutBtn = true;
                            app.authenticated = response.data.authenticated;
                            app.cartLoading = false;
                            console.log(app.authenticated);
                        }
                    }).catch((e)=> console.log(e))
                // },2000);
            },
            updateQuantity: (productId, operator) =>{
                console.log(productId, operator);
                let postData = $.param({product_id: productId, operator: operator});
                axios.post('/cart/update', postData).then((response) => {
                    app.updateCartView();

                }).catch((e) => {
                    console.log(e);
                    $("#toast").removeClass('alert-success').addClass('alert-danger').css("display", "block").html(e);
                });
            },

            updateCartView: () =>{
                app.cartLoading = true;
                setTimeout(function(){
                    axios.get('/items').then((response)=>{
                        if(response.data.error){
                            // It means cart is empty
                            app.cartLoading = false;
                            app.items = [];
                            app.disableCheckoutBtn = true;
                            app.message = response.data.error;
                        }else if(response.data.items !== undefined){
                            app.items = response.data.items;
                            app.cartTotal = response.data.cartTotal;
                            app.grandTotal = response.data.grandTotal;
                            app.delivery_fee = response.data.delivery_fee;
                            console.log(response.data.items);
                            app.cartLoading = false;
                            app.disableCheckoutBtn = false;
                        }else{
                            app.disableCheckoutBtn = true;
                            app.cartLoading = false;
                        }
                    })
                },200);
            },
            removeItem: (index, productId) => {
                let postData = $.param({index: index, product_id:productId});
                axios.post('/cart/remove', postData).then((response) => {
                    console.log(response.data);
                    $("#toast").css("display", "block").html(response.data.success);
                }).then(() =>{
                    app.updateCartView();
                });
            },

        },
        beforeMount(){
            this.loading = true;
            this.getProducts();
            this.getCartItems();
        }
    });
});
