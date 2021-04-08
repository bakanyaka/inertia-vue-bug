<template>
    <guest>
        <div>
            <div class="mt-2 text-right">
                <label class="inline-flex items-center leading-none">
                    <input v-model="checkBox" type="checkbox" class="mr-2"/>
                    <span>Test checkbox</span>
                </label>
            </div>
            <div>
                <div v-for="value in someData" :key="value">
                    {{ value }}
                </div>
            </div>
        </div>
    </guest>
</template>

<script>
import Guest from "../Layouts/Guest";
import {ref, watchEffect} from "vue";

export default {
    components: {Guest},
    setup() {
        const checkBox = ref(false);
        const someData = ref([]);
        watchEffect(async () => {
            const {data} = await axios.get('/data', {params: {test: checkBox.value ? 1 : 0}});
            someData.value = data.someData;
        })
        return {checkBox, someData}
    }
}
</script>
