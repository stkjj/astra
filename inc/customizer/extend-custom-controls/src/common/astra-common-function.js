/**
 * Check whether the string is JSON or not.
 *
 * @param {string} text
 *
 * @return {boolean} True if JSON else false.
 */
export default function astraIsJSON( text ) {
    if (typeof text !== "string") {
        return false;
    }
    try {
        JSON.parse(text);
        return true;
    } catch (error) {
        return false;
    }
}
