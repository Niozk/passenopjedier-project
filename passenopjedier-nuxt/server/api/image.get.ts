import { defineEventHandler } from "h3";

export default defineEventHandler(async (event) => {

    try {   
        const response = await $fetch(`http://localhost/api/uploads/profile-pictures/1713716262.png`, {})
        return response
    }
    catch (error) {
        return error
    }
})