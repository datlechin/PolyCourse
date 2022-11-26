const dateFormat = (value  , locale = 'vi-VN') => {
    const date = new Date(value)

    return new Intl.DateTimeFormat(locale).format(date)
}

const numberFormat = (number, locale = 'vi-VN', options = {}) => {
    return new Intl.NumberFormat(locale, options).format(number)
}

const priceFormat = (number, currency = 'VND') => {
    return numberFormat(number, 'vi-VN', {
        style: 'currency',
        currency: 'VND',
    })
}

const secondsToTime = (seconds) => {
    let hour = Math.floor(seconds / 3600)
    let minute = Math.floor(seconds % 3600 * 60)
    let second = Math.floor(seconds % 3600 / 60)

    let hourText = hour > 0 ? `${hour} giờ` : ''
    let minuteText = minute > 0 ? `${minute} phút` : ''
    return `${hourText} ${minuteText}`
}

export { numberFormat, dateFormat, priceFormat, secondsToTime }
