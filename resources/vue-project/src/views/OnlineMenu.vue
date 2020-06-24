<template>
    <div class="menu-container">
        <div class="container">
            <div class="content-space">
                <div class="info-block">
                    <div class="info-title wrapper">
                        <h2>Online order</h2>
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
                    <div class="online">
                        <div class="select-food">
                            <button class="select" v-on:click="Salads">Salads</button>
                            <button class="select" >Hot meals</button>
                            <button class="select" >Snacks</button>
                            <button class="select" >Beverages</button>
                        </div>
                        <div class="under-line"></div>
                        <div class="products">
                            <div class="product-block" :key="food.value" v-for="food in MenuData">
                                <div class="product-image"><img :src="food.image"/></div>
                                <div class="product-info">
                                    <p class="product-name">{{ food.name }}</p>
                                    <p class="discription">{{ food.discription }}</p>
                                    <p class="product-price">{{ food.price }}$</p>
                                    <button class="green-btn add" v-on:click="BuyMethod" :data-id="food.id">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'OnlineMenu',
        data(){
            return {
                MenuData : [],
                FoodCart :[],
            }
        },
        mounted() {
            this.$axios({
                method: 'GET',
                url: 'http://restoran.test/api/online',
            }).then(response => {
                let meals = this.MenuData;
                for (let i = 0;i<response.data.length;i++){
                    if(response.data[i].relate_food == 'online'){
                        meals.push(response.data[i]);
                    }
                }
            });
            this.Check();
        },
        created() {

        },
        computed:{
            Salads:function(){
                return this.MenuData.filter(type => {
                    return type.type_food.indexOf("salad") !== -1;
                })
            },
        },
        methods: {
            BuyMethod:function(event){
                let food_cart = this.FoodCart;
                if(event.target.classList.contains('add')){
                    food_cart.push(event.target.dataset.id);
                    food_cart = JSON.stringify(food_cart);
                    localStorage.setItem('cart',food_cart);
                }
            },
            Check : function () {
                if(localStorage.getItem('cart') == null){
                    localStorage.setItem('cart','[]')
                }else{
                    this.FoodCart = JSON.parse(localStorage.getItem('cart'));
                }
            }
        },
    }
</script>
