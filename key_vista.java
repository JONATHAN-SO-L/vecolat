   <%
   public class key_vista {
    
//    constant declaration
    public static final int ASCII_ZERO = 48;
    public static final int ASCII_NINE = 57;
    public static final int ASCII_A = 65;
    public static final int ASCII_Z = 90;
    public static final int ASCII_a = 97;
    public static final int ASCII_z = 122;

  
    /**
     * This method generate password from serial number
     * @param view current view
     */
     public static void main(String[] args) {
        // Your code here!
        
//        get serial number from user
        String serialNumberText = getSerialNumber();
//        convert serial number to int
        int seed = convertStringToInt(serialNumberText);
//        Get password
        int passwordValue = getToken(seed);
//        show password to user
        System.out.println(passwordValue);
        //document.getElementById('demo').passwordValue;
    }

    /**
     * This method get serial number from user input
     * @return serial number text string
     */
    public static String getSerialNumber() {
        //        read password form user input
        String passwordCode = "E_6868";
        return passwordCode;
       // System.out.println(passwordCode);
    }

    /**
     * This method convert an array to and integer
     * @param  data String to be converted
     * @return numeric data
     */
    public static int convertStringToInt(String data) {
//        Initialize result
        int dataOut = 0;
        int value;
//        scan array data
        for (int i = 0; i < data.length(); i++) {
            value = (int) data.charAt(i);
            if ((value >= ASCII_ZERO) && (value <= ASCII_NINE)){
                dataOut = dataOut*10 + (value - ASCII_ZERO);
            } else {
                if ((value >= ASCII_A) && (value <= ASCII_Z)) {
                    dataOut = dataOut*10 + (value - ASCII_A)%10;
                } else if ((value >= ASCII_a) && (value <= ASCII_z)) {
                    dataOut = dataOut*10 + (value - ASCII_a)%10;
                }
            }
        }
        return dataOut;
    }

    /**
     * This method generate dinamic password base on a seed
     * @param  seed source value for password genration
     * @return password value
     */
    public static int getToken(int seed) {
        Calendar calendar = Calendar.getInstance();
        int mMonth = calendar.get(Calendar.MONTH) + 1;
        int mDay = calendar.get(Calendar.DAY_OF_MONTH);
        int mHour = calendar.get(Calendar.HOUR_OF_DAY);
        int mToken;
        int mTmpShift;
        int[] mParam;
        int[] mIdValue;

        mParam = new int[6];
        mIdValue = new int[6];
        
//        load time stamp
        mParam[0] = mHour % 10;
        mParam[1] = mHour / 10;
        mParam[2] = mDay % 10;
        mParam[3] = mDay / 10;
        mParam[4] = mMonth % 10;
        mParam[5] = mMonth / 10;
//        load seed
        mIdValue[5] = seed / 100000;
        mIdValue[4] = (seed / 10000) % 10;
        mIdValue[3] = (seed / 1000) % 10;
        mIdValue[2] = (seed / 100) % 10;
        mIdValue[1] = (seed / 10) % 10;
        mIdValue[0] = seed % 10;
//        Generate shifting based on cross references
        mTmpShift = 0xFF & (mParam[0] % 8);
        mParam[5] = 0xFF & ((mParam[5] << mTmpShift) | (mParam[5] >> (8 - mTmpShift)));
        mParam[3] = 0xFF & ((mParam[3] >> mTmpShift) | (mParam[3] << (8 - mTmpShift)));
        mParam[1] = 0xFF & ((mParam[1] << mTmpShift) | (mParam[1] >> (8 - mTmpShift)));

        mTmpShift = 0xFF & (mParam[2] % 8);
        mParam[4] = 0xFF & ((mParam[4] << mTmpShift) | (mParam[4] >> (8 - mTmpShift)));
        mParam[2] = 0xFF & ((mParam[2] >> mTmpShift) | (mParam[2] << (8 - mTmpShift)));
        mParam[0] = 0xFF & ((mParam[0] << mTmpShift) | (mParam[0] >> (8 - mTmpShift)));

        mTmpShift = 0xFF & (mParam[4] % 8);
        mParam[5] = 0xFF & ((mParam[5] << mTmpShift) | (mParam[5] >> (8 - mTmpShift)));
        mParam[2] = 0xFF & ((mParam[2] >> mTmpShift) | (mParam[2] << (8 - mTmpShift)));
        mParam[1] = 0xFF & ((mParam[1] << mTmpShift) | (mParam[1] >> (8 - mTmpShift)));

//        Mix shifted day data and seed
        for (mTmpShift = 0; mTmpShift < 6; mTmpShift++) {
            mParam[mTmpShift] += mIdValue[mTmpShift];
        }

        // Final digits calculation
        mIdValue[5] = 0xFF & ((mParam[0]) % 10);
        mIdValue[4] = 0xFF & (((mParam[5] << 5) | (mParam[5] >> (8 - 5))) % 10);
        mIdValue[3] = 0xFF & (((mParam[2] >> 2) | (mParam[2] << (8 - 2))) % 10);
        mIdValue[2] = 0xFF & (((mParam[3] << 3) | (mParam[3] >> (8 - 3))) % 10);
        mIdValue[1] = 0xFF & (((mParam[4] >> 4) | (mParam[4] << (8 - 4))) % 10);
        mIdValue[0] = 0xFF & (((mParam[1] << 1) | (mParam[1] >> (8 - 1))) % 10);

        mToken  = mIdValue[5] * 100000;
        mToken += mIdValue[4] * 10000;
        mToken += mIdValue[3] * 1000;
        mToken += mIdValue[2] * 100;
        mToken += mIdValue[1] * 10;
        mToken += mIdValue[0];
        
        return mToken;
    }

}
	%>