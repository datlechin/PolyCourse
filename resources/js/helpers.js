export const dateFormat = (value  , locale = 'vi-VN') => {
    const date = new Date(value)

    return new Intl.DateTimeFormat(locale).format(date)
}

export const numberFormat = (number, locale = 'vi-VN', options = {}) => {
    return new Intl.NumberFormat(locale, options).format(number)
}

export const priceFormat = (number, currency = 'VND') => {
    return numberFormat(number, 'vi-VN', {
        style: 'currency',
        currency: 'VND',
    })
}
