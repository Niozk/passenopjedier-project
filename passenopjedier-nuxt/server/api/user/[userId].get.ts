import { defineEventHandler } from "h3";

export default defineEventHandler(async (event) => {
    const userId = getRouterParam(event, 'userId');

    try {   
        const response = await $fetch(`http://localhost/api/users/${userId}`, {})
        return response
    }
    catch (error) {
        return error
    }
})