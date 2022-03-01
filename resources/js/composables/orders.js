import { ref } from "vue";
import axios from "axios";

export default function useOrders() {
    const orders = ref([]);
    const shoppingCart = ref([]);
    const price = ref(0)

    const indexOrders = async () => {
        let response = await axios.get("/api/orders");
        orders.value = response.data.data;
    };

    const storeOrders = async () => {
        await axios
            .post("/api/orders", {
                orders: JSON.stringify(shoppingCart.value.map((item) => {
                    return {
                        id: item.id,
                        price: item.price,
                        amount: item.amount
                    }
                })),
                price: price.value
            })
            .then((response) => {
                localStorage.removeItem("shoppingCart");
                window.location.href = response.data.data.process_url;
            });
    };

    const indexShopingCart = () => {
        if (localStorage.getItem("shoppingCart")) {
            shoppingCart.value = JSON.parse(
                localStorage.getItem("shoppingCart")
            );
        }
    };

    return {
        orders,
        shoppingCart,
        price,
        indexShopingCart,
        indexOrders,
        storeOrders,
    };
}