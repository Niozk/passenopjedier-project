import { defineEventHandler, getRouterParam } from "h3";

export default defineEventHandler(async (event) => {
    const adId = getRouterParam(event, 'id');
    const adType = getRouterParam(event, 'adType');

    try {   
        const response = await $fetch(`http://localhost/api/reviews/${adId}/${adType}`, {})
        return response
    }
    catch (error) {
        return error
    }
})