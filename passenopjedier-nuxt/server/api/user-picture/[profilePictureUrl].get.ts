import { defineEventHandler } from "h3";

export default defineEventHandler(async (event) => {
    const profilePictureUrl = getRouterParam(event, 'profilePictureUrl');

    try {   
        const response = await $fetch(`http://localhost/api/uploads/profile-pictures/${profilePictureUrl}`, {})
        return response
    }
    catch (error) {
        return error
    }
})