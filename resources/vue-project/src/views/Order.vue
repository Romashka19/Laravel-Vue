<template>
    <div class="menu-container">
        <div class="container">
            <div class="content-space">
                <div class="info-block">
                    <div class="info-title wrapper">
                        <h2>Place your order</h2>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <div class="adress-info">
                        <p class="title-col">RESERVATION</p>
                        <p>Phone: +7 (495) 000-00-00</p>
                        <p>Email: info@mysite.ru</p>
                        <div class="under-line"></div>
                        <p class="title-col">OPENING HOURS</p>
                        <p>Monday - Sunday</p>
                        <p>10:00 to the last customer</p>
                    </div>
                </div>
                <div class="main-content-block">
                    <div class="order-block">
                        <div class="orders-block">
                            <p>Your order</p>
                            <div v-bind:key="order.value" v-for="order in Cart">
                                <div class="under-line"></div>
                                <div class="order">
                                    <div class="name-price">
                                        <p class="name">{{ order.name }}</p>
                                        <p class="price">{{ order.price }}$</p>
                                    </div>
                                    <div class="about">
                                        <p class="discription">{{ order.discription }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-price">
                            <p class="title">Your check</p>
                            <div class="info-check" v-bind:key="order.value" v-for="order in Cart">
                                <p class="cost">{{ order.price }}$</p>
                                <p class="plus">+</p>
                            </div>
                            <div class="price">
                                <p>Total : {{ Price }}$</p>
                            </div>
                            <div class="under-line"></div>
                            <div class="wishes">
                                <textarea placeholder="Special wishes"></textarea>
                            </div>
                            <button class="green-btn buy">Buy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Order',
        data() {
            return {
                Cart: [],
                Price: null
            }
        },
        components: {},
        mounted() {
            this.$axios({
                method: 'GET',
                url: 'http://restoran.test/api/order',
            }).then(response => {
                let meals = this.Cart;
                let food_cart = JSON.parse(localStorage.getItem('cart'));
                for (let i = 0;i<response.data.length;i++){
                    for(let j = 0;j<food_cart.length;j++){
                        if(response.data[i].id == food_cart[j]){
                            meals.push(response.data[i]);
                            this.Price = this.Price + response.data[i].price;
                        }
                    }
                }
            });
            this.Check();
        },
        methods: {
            Check : function () {
                if(localStorage.getItem('cart') == null){
                    localStorage.setItem('cart','[]')
                }
            },
            CompleteMethod : function () {

            }
        },
    }
</script>
