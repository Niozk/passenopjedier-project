import { defineEventHandler } from "h3";

export default defineEventHandler(async (event) => {
    const userId = getRouterParam(event, 'userid');

    try {   
        const response = await $fetch(`http://localhost:80/api/users/${userId}`, {})
        return response
    }
    catch (error) {
        return error
    }
})