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

const secondsToTime = (number) => {
    let hours = Math.floor(number / 3600);
    let minutes = Math.floor(number % 3600 / 60);
    let seconds = Math.floor(number % 3600 % 60);

    let hoursText = hours > 0 ? hours + ' giờ ' : "";
    let minutesText = minutes > 0 ? minutes + ' phút ' : "";
    // let secondsText = seconds > 0 ? seconds + ' giây ' : "";
    return hoursText + minutesText;
}

export { numberFormat, dateFormat, priceFormat, secondsToTime }
