<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <router-link :to="{name: 'AddNew'}" class="btn btn-outline-primary">Add new</router-link>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(product, index) in products" :key="product.id">
                                <th scope="row">{{ ++index }}</th>
                                <td>{{ product.product_name }}</td>
                                <td>{{ product.product_price }}</td>
                                <td>
                                    <a href="" class="btn btn-outline-primary">Edit</a>
                                    <a href="" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            products: [],
        };
    },
    mounted() {
        this.ProductList();
    },
    methods:{
        ProductList() {
            axios.get('/api/product')
                .then((response) => {
                    console.log(response.data.products);
                    this.products = response.data.products;
                }).catch((error) => {
                console.log(error);
            });
        },
    }
};
</script>

<style lang="scss" scoped>

</style>
